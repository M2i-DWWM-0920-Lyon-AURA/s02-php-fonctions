<?php

// Pas touche!

class TestCase {
    public $expectedResult;
    public $funcName;
    public $parameters;

    public function __construct($expectedResult, string $funcName, array $parameters = []) {
        $this->expectedResult = $expectedResult;
        $this->funcName = $funcName;
        $this->parameters = $parameters;
    }

    public function result() {
        return call_user_func_array($this->funcName, $this->parameters);
    }

    public function assert(): boolval {
        return $this->result() === $this->expectedResult;
    }
}

function displayResult($result): string {
    $typeColor = [
        'integer' => 'primary',
        'double' => 'info',
        'string' => 'secondary',
        'array' => 'success',
        'boolean' => 'light',
    ];

    $type = gettype($result);
    $color = isset($typeColor[$type]) ? $typeColor[$type] : 'dark';

    return '<span class="badge badge-' . $color . '">' . $type . '</span> ' . var_export($result, true);
    // return preg_replace('/^(\w+)\((.+)\)/', '<span class="muted">\1(</span>\2<span class="muted">)</span>', var_export($result));
}

function executeTests($tests): void { ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Appel</th>
                <th scope="col">Résultat</th>
                <th scope="col">Résultat attendu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $testCase): ?>
            <tr>
                <td><pre><?= $testCase->funcName . '(' . implode(', ', $testCase->parameters) . ')' ?></pre></td>
                <td><?= displayResult($testCase->result()) ?></td>
                <td><?= displayResult($testCase->expectedResult) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php }

function testFunction(string $funcName, array $tests): void { ?>
    <h2 class="mt-4 mb-2">Fonction "double"</h2>

    <?php if (function_exists($funcName)) {
        executeTests($tests);
    } else { ?>
        <div class="alert alert-danger">La fonction n'existe pas</div>
    <?php }
}

testFunction('double', [
    new TestCase(0, 'double', [0]),
    new TestCase(8, 'double', [4]),
    new TestCase(200, 'double', [100]),
    new TestCase(-14, 'double', [-7])
]);
