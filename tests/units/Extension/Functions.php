<?php

declare(strict_types = 1);

namespace Wasm\Tests\Units\Extension;

use ReflectionExtension;
use ReflectionFunction;
use RuntimeException;
use StdClass;
use WasmArrayBuffer;
use WasmUint8Array;
use Wasm\Tests\Suite;

class Functions extends Suite
{
    const FILE_PATH = __DIR__ . '/../tests.wasm';

    public function getTestedClassName()
    {
        return StdClass::class;
    }

    public function getTestedClassNamespace()
    {
        return '\\';
    }

    public function test_reflection_functions()
    {
        $this
            ->given($reflection = new ReflectionExtension('wasm'))
            ->when($result = $reflection->getFunctions())
            ->then
                ->array($result)
                    ->hasSize(13)
                    ->object['wasm_fetch_bytes']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_validate']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_compile']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_module_clean_up_persistent_resources']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_module_serialize']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_module_deserialize']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_module_new_instance']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_new_instance']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_get_function_signature']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_value']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_invoke_function']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_get_memory_buffer']->isInstanceOf(ReflectionFunction::class)
                    ->object['wasm_get_last_error']->isInstanceOf(ReflectionFunction::class)

            ->when($_result = $result['wasm_fetch_bytes'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(1)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('file_path')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('string')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('resource')
                ->boolean($return_type->allowsNull())
                    ->isFalse()

            ->when($_result = $result['wasm_validate'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(1)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_bytes')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('bool')
                ->boolean($return_type->allowsNull())
                    ->isFalse()

            ->when($_result = $result['wasm_compile'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(2)
                ->integer($_result->getNumberOfRequiredParameters())
                    ->isEqualTo(1)

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_bytes')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->string($parameters[1]->getName())
                    ->isEqualTo('wasm_module_unique_identifier')
                ->string($parameters[1]->getType() . '')
                    ->isEqualTo('string')
                ->boolean($parameters[1]->getType()->allowsNull())
                    ->isTrue()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('resource')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_module_clean_up_persistent_resources'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(0)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('void')
                ->boolean($return_type->allowsNull())
                    ->isFalse()

            ->when($_result = $result['wasm_module_serialize'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(1)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_module')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('string')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_module_deserialize'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(1)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_serialized_module')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('string')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('resource')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_module_new_instance'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(1)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_module')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('resource')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_new_instance'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(1)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_bytes')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('resource')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_get_function_signature'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(2)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_instance')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->string($parameters[1]->getName())
                    ->isEqualTo('function_name')
                ->string($parameters[1]->getType() . '')
                    ->isEqualTo('string')
                ->boolean($parameters[1]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('array')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_value'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(2)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('type')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('int')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->string($parameters[1]->getName())
                    ->isEqualTo('value')
                ->boolean($parameters[1]->hasType())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('resource')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_invoke_function'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(3)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_instance')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->string($parameters[1]->getName())
                    ->isEqualTo('function_name')
                ->string($parameters[1]->getType() . '')
                    ->isEqualTo('string')
                ->boolean($parameters[1]->getType()->allowsNull())
                    ->isFalse()

                ->string($parameters[2]->getName())
                    ->isEqualTo('inputs')
                ->string($parameters[2]->getType() . '')
                    ->isEqualTo('array')
                ->boolean($parameters[2]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('number')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_get_memory_buffer'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(1)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($parameters = $_result->getParameters())

                ->string($parameters[0]->getName())
                    ->isEqualTo('wasm_instance')
                ->string($parameters[0]->getType() . '')
                    ->isEqualTo('resource')
                ->boolean($parameters[0]->getType()->allowsNull())
                    ->isFalse()

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('WasmArrayBuffer')
                ->boolean($return_type->allowsNull())
                    ->isTrue()

            ->when($_result = $result['wasm_get_last_error'])
            ->then
                ->integer($_result->getNumberOfParameters())
                    ->isEqualTo(0)
                    ->isEqualTo($_result->getNumberOfRequiredParameters())

                ->let($return_type = $_result->getReturnType())

                ->string($return_type . '')
                    ->isEqualTo('string')
                ->boolean($return_type->allowsNull())
                    ->isTrue();
    }

    public function test_wasm_fetch_bytes()
    {
        $this
            ->when($result = wasm_fetch_bytes(self::FILE_PATH))
            ->then
                ->resource($result)
                    ->isOfType('wasm_bytes');
    }

    public function test_wasm_validate()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes(self::FILE_PATH))
            ->when($result = wasm_validate($wasmBytes))
            ->then
                ->boolean($result)
                    ->isTrue();
    }

    public function test_wasm_validate_nop()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes(__DIR__ . '/invalid.wasm'))
            ->when($result = wasm_validate($wasmBytes))
            ->then
                ->boolean($result)
                    ->isFalse();
    }

    public function test_wasm_validate_unknown_file()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes('foo'))
            ->when($result = wasm_validate($wasmBytes))
            ->then
                ->boolean($result)
                    ->isFalse();
    }

    public function test_wasm_compile()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes(self::FILE_PATH))
            ->when($result = wasm_compile($wasmBytes))
            ->then
                ->resource($result)
                    ->isOfType('wasm_module');
    }

    public function test_wasm_compile_invalid_bytes()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes(dirname(__DIR__) . '/invalid.wasm'))
            ->when($result = wasm_compile($wasmBytes))
            ->then
                ->variable($result)
                    ->isNull()
                ->string(wasm_get_last_error())
                    ->isEqualTo('Validation error "Invalid type"');
    }

    public function test_wasm_compile_unknown_file()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes('foo'))
            ->when($result = wasm_compile($wasmBytes))
            ->then
                ->variable($result)
                    ->isNull();
    }

    public function test_wasm_compile_with_an_unique_identifier()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmModuleIdentifier = __METHOD__
            )
            ->when($result = wasm_compile($wasmBytes, $wasmModuleIdentifier))
            ->then
                ->resource($result)
                    ->isOfType('wasm_module')
                ->string($result . '')
                    ->isEqualTo('Resource id #-1');
    }

    public function test_wasm_compile_with_an_unique_identifier_boost_performances()
    {
        $this
            // First compilation.
            ->given(
                $timeA = microtime(true),
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmModuleIdentifier = __METHOD__,
                $wasmModule = wasm_compile($wasmBytes, $wasmModuleIdentifier),
                $timeB = microtime(true)
            )

            // Second compilation. Must be way faster because a module unique
            // identifier has been passed, and thus the module resource will
            // be persistent.
            ->given(
                $timeC = microtime(true),
                $wasmModule = wasm_compile($wasmBytes, $wasmModuleIdentifier),
                $timeD = microtime(true)
            )

            // Calculate the speedup.
            ->when($result = ($timeB - $timeA) / ($timeD - $timeC))
            ->then
                ->float($result)
                    ->isGreaterThan(
                        5000, // This is an arbritary value, it just represents a threshold.
                        'If this is failing, it means that the bytes are read, ' .
                        'and that the module is compiled again, which is not good.'
                    );
    }

    public function test_wasm_module_serialize()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmModule = wasm_compile($wasmBytes)
            )
            ->when($result = wasm_module_serialize($wasmModule))
            ->then
                ->string($result)
                    ->isNotEmpty()
                    ->startWith("WASMER\0\0");
    }

    public function test_wasm_module_deserialize()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmModule = wasm_compile($wasmBytes),
                $wasmSerializedModule = wasm_module_serialize($wasmModule)
            )
            ->when($result = wasm_module_deserialize($wasmSerializedModule))
            ->then
                ->resource($result)
                    ->isOfType('wasm_module')

            ->given(
                $wasmInstance = wasm_module_new_instance($result),
                $wasmArguments = [
                    wasm_value(WASM_TYPE_I32, 1),
                    wasm_value(WASM_TYPE_I32, 2),
                ]
            )
            ->when($result = wasm_invoke_function($wasmInstance, 'sum', $wasmArguments))
            ->then
                ->integer($result)
                    ->isEqualTo(3);
    }

    public function test_wasm_module_deserialize_failed()
    {
        $this
            ->given($wasmSerializedModule = 'foobar')
            ->when($result = wasm_module_deserialize($wasmSerializedModule))
            ->then
                ->variable($result)
                    ->isNull()
                ->string(wasm_get_last_error())
                    ->isEqualTo('Failed to deserialize the module');
    }

    public function test_wasm_module_new_instance()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmModule = wasm_compile($wasmBytes)
            )
            ->when($result = wasm_module_new_instance($wasmModule))
            ->then
                ->resource($result)
                    ->isOfType('wasm_instance');
    }

    public function test_wasm_new_instance()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes(self::FILE_PATH))
            ->when($result = wasm_new_instance($wasmBytes))
            ->then
                ->resource($result)
                    ->isOfType('wasm_instance');
    }

    public function test_wasm_new_instance_unknown_file()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes('foo'))
            ->when($result = wasm_new_instance($wasmBytes))
            ->then
                ->variable($result)
                    ->isNull();
    }

    public function test_wasm_new_instance_failed_to_compile()
    {
        $this
            ->given($wasmBytes = wasm_fetch_bytes(__DIR__ . '/empty.wasm'))
            ->when($result = wasm_new_instance($wasmBytes))
            ->then
                ->variable($result)
                    ->isNull();
    }

    /**
     * @dataProvider signatures
     */
    public function test_wasm_get_function_signature(string $functionName, array $signature)
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmInstance = wasm_new_instance($wasmBytes)
            )
            ->when($result = wasm_get_function_signature($wasmInstance, $functionName))
            ->then
                ->array($result)
                    ->isEqualTo($signature);
    }

    protected function signatures() {
        yield 'arity_0' => [
            'functionName' => 'arity_0',
            'signature' => [
                WASM_TYPE_I32,
            ],
        ];

        yield 'i32_i32' => [
            'functionName' => 'i32_i32',
            'signature' => [
                WASM_TYPE_I32,
                WASM_TYPE_I32,
            ],
        ];

        yield 'i32_i64_f32_f64_f64' => [
            'functionName' => 'i32_i64_f32_f64_f64',
            'signature' => [
                WASM_TYPE_I32,
                WASM_TYPE_I64,
                WASM_TYPE_F32,
                WASM_TYPE_F64,
                WASM_TYPE_F64,
            ],
        ];

        yield 'bool_casted_to_i32' => [
            'functionName' => 'bool_casted_to_i32',
            'signature' => [
                WASM_TYPE_I32,
            ],
        ];
    }

    /**
     * @dataProvider values
     */
    public function test_wasm_value(int $type, $value)
    {
        $this
            ->when($result = wasm_value($type, $value))
            ->then
                ->resource($result)
                    ->isOfType('wasm_value');
    }

    protected function values()
    {
        yield 'i32' => [WASM_TYPE_I32, 1];
        yield 'i64' => [WASM_TYPE_I64, 1];
        yield 'f32' => [WASM_TYPE_F32, 1.];
        yield 'f64' => [WASM_TYPE_F64, 1.];
    }

    public function test_wasm_value_unknown_type()
    {
        $this
            ->when($result = wasm_value(42, 1))
            ->then
                ->variable($result)
                    ->isNull();
    }

    public function test_wasm_invoke_function()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmInstance = wasm_new_instance($wasmBytes),
                $wasmArguments = [
                    wasm_value(WASM_TYPE_I32, 1),
                    wasm_value(WASM_TYPE_I32, 2)
                ]
            )
            ->when($result = wasm_invoke_function($wasmInstance, 'sum', $wasmArguments))
            ->then
                ->integer($result)
                    ->isEqualTo(3);
    }

    public function test_wasm_invoke_function_with_wrong_parameters()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmInstance = wasm_new_instance($wasmBytes),
                $wasmArguments = [wasm_value(WASM_TYPE_I32, 1)]
            )
            ->when($result = wasm_invoke_function($wasmInstance, 'i64_i64', $wasmArguments))
            ->then
                ->variable($result)
                    ->isNull()
                ->string(wasm_get_last_error())
                    ->isEqualTo('Call error: Parameters of type [I32] did not match signature [I64] -> [I64]');
    }

    /**
     * @dataProvider invokes
     */
    public function test_wasm_invoke_functions(string $functionName, array $inputs, $output)
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmInstance = wasm_new_instance($wasmBytes),
                $wasmArguments = $inputs
            )
            ->when($result = wasm_invoke_function($wasmInstance, $functionName, $wasmArguments))
            ->then
                ->variable($result)
                    ->isEqualTo($output);
    }

    protected function invokes()
    {
        yield 'arity_0' => [
            'arity_0',
            [],
            42
        ];

        yield 'i32_i32' => [
            'i32_i32',
            [
                wasm_value(WASM_TYPE_I32, 7),
            ],
            7
        ];

        yield 'i64_i64' => [
            'i64_i64',
            [
                wasm_value(WASM_TYPE_I64, 7),
            ],
            7
        ];

        yield 'f32_f32' => [
            'f32_f32',
            [
                wasm_value(WASM_TYPE_F32, 7.),
            ],
            7.
        ];

        yield 'f64_f64' => [
            'f64_f64',
            [
                wasm_value(WASM_TYPE_F64, 7.),
            ],
            7.
        ];

        yield 'i32_i64_f32_f64_f64' => [
            'i32_i64_f32_f64_f64',
            [
                wasm_value(WASM_TYPE_I32, 1),
                wasm_value(WASM_TYPE_I64, 2),
                wasm_value(WASM_TYPE_F32, 3.),
                wasm_value(WASM_TYPE_F64, 4.),
            ],
            10.
        ];

        yield 'bool_casted_to_i32' => [
            'bool_casted_to_i32',
            [],
            1
        ];

        yield 'string' => [
            'string',
            [],
            1048576 // pointer
        ];
    }

    public function test_wasm_get_memory_buffer()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmInstance = wasm_new_instance($wasmBytes),
                $stringPointer = wasm_invoke_function($wasmInstance, 'string', [])
            )
            ->when($memory = wasm_get_memory_buffer($wasmInstance))
            ->then
                ->object($memory)
                    ->isInstanceOf(WasmArrayBuffer::class)

            ->let($string = '')
            ->when(
                function () use ($memory, $stringPointer, &$string) {
                    $view = new WasmUint8Array($memory, $stringPointer);

                    $this
                        ->integer($view->getOffset())
                            ->isEqualTo($stringPointer);

                    $nth = 0;

                    while (0 !== $view[$nth]) {
                        $string .= chr($view[$nth]);
                        ++$nth;
                    }
                }
            )
            ->then
                ->string($string)
                    ->isEqualTo('Hello, World!');
    }

    public function test_wasm_get_memory_buffer_with_no_exported_memory()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(dirname(__DIR__) . '/no_memory.wasm'),
                $wasmInstance = wasm_new_instance($wasmBytes),
                $stringPointer = wasm_invoke_function($wasmInstance, 'string', [])
            )
            ->when($memory = wasm_get_memory_buffer($wasmInstance))
            ->then
                ->variable($memory)
                    ->isNull();
    }

    public function test_wasm_get_last_error()
    {
        $this
            ->given(
                $wasmBytes = wasm_fetch_bytes(self::FILE_PATH),
                $wasmInstance = wasm_new_instance($wasmBytes),
                $wasmArguments = []
            )
            ->when($result = wasm_invoke_function($wasmInstance, 'sum', $wasmArguments))
            ->then
                ->variable($result)
                    ->isNull()

            ->when($result = wasm_get_last_error())
                ->string($result)
                    ->isEqualTo('Call error: Parameters of type [] did not match signature [I32, I32] -> [I32]');
    }

    public function test_wasm_get_last_error_without_any_error()
    {
        $this
            ->when($result = wasm_get_last_error())
                ->variable($result)
                    ->isNull();
    }
}
