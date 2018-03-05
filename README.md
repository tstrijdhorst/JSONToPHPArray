# Convert JSON to PHP Array Syntax

## Usage
```
echo (new JSONToPHPArrayConverter())->convert('{"valid" : "json"}');
```

or from cli

```
echo '{"valid" : "json"}' | php convert.php
```

## Output
```
[
  'valid' => 'json',
]
```