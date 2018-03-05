# Convert JSON to PHP Array Syntax

## Usage
```
echo (new JSONToPHPArrayConverter())->convert('{"valid" : "json"}');
```

## Output
```
[
	'valid' => 'json',
]
```