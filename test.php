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
                <td><pre><code><?= $testCase->funcName . '(' . implode(', ', array_map(fn($item) => var_export($item, true), $testCase->parameters)) . ')' ?></code></pre></td>
                <td><?= displayResult($testCase->result()) ?></td>
                <td><?= displayResult($testCase->expectedResult) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php }

function testFunction(string $funcName, array $tests): void { ?>
    <h2 class="mt-4 mb-2">Fonction "<?= $funcName ?>"</h2>

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

testFunction('doubleArray', [
    new TestCase([0, 2, 4], 'doubleArray', [[0, 1, 2]]),
    new TestCase([20], 'doubleArray', [[10]]),
    new TestCase([-6, -20], 'doubleArray', [[-3, -10]]),
    new TestCase([], 'doubleArray', [[]]),
]);

testFunction('parseAction', [
    new TestCase(['look'], 'parseAction', ['look']),
    new TestCase(['open', 'door'], 'parseAction', ['open door']),
    new TestCase(['attack', 'troll'], 'parseAction', ['attack troll']),
    new TestCase(null, 'parseAction', [''])
]);
