Ahoj Praho!

$msmlurl = 'https://ussouthcentral.services.azureml.net/workspaces/55ae579bdbe642f2a33389eac9b3b66d/services/0254fbfde85f4efe8117e31a14784bdc/execute?api-version=2.0&details=true'
$data = "{
  "Inputs": {
    "input1": {
      "ColumnNames": [
        "test.length",
        "seasonality",
        "observation.freq",
        "timeformat"
      ],
      "Values": [
        [
          "0",
          "0",
          "value",
          "value"
        ],
        [
          "0",
          "0",
          "value",
          "value"
        ]
      ]
    }
  },
  "GlobalParameters": {}
}";

$options = array(
    'http' => array(
        'header'  => "Authorization:Bearer JV8Z6eT6vzNu8vHVjlvIkBiMbcO7p3akiecl7KybUlUIDxWUGA0lXbLcAAPx18y2IjM1yUPmdOEjwf9uUIf4KQ==\r\nContent-Length 100\r\nContent-Type:application/json\r\nAccept: application/json\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);