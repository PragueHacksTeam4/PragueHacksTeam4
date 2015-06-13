import urllib2
# If you are using Python 3+, import urllib instead of urllib2

import json 


data =  {

        "Inputs": {

                "input1":
                {
                    "ColumnNames": ["test.length", "seasonality", "observation.freq", "timeformat"],
                    "Values": [ [ "0", "0", "value", "value" ], [ "0", "0", "value", "value" ], ]
                },        },
            "GlobalParameters": {
}
    }

body = str.encode(json.dumps(data))

url = 'https://ussouthcentral.services.azureml.net/workspaces/55ae579bdbe642f2a33389eac9b3b66d/services/0254fbfde85f4efe8117e31a14784bdc/execute?api-version=2.0&details=true'
api_key = 'JV8Z6eT6vzNu8vHVjlvIkBiMbcO7p3akiecl7KybUlUIDxWUGA0lXbLcAAPx18y2IjM1yUPmdOEjwf9uUIf4KQ==' # Replace this with the API key for the web service
headers = {'Content-Type':'application/json', 'Authorization':('Bearer '+ api_key)}

req = urllib2.Request(url, body, headers) 

try:
    response = urllib2.urlopen(req)

    # If you are using Python 3+, replace urllib2 with urllib.request in the above code:
    # req = urllib.request.Request(url, body, headers) 
    # response = urllib.request.urlopen(req)

    result = response.read()
    print(result) 
except urllib2.HTTPError, error:
    print("The request failed with status code: " + str(error.code))

    # Print the headers - they include the requert ID and the timestamp, which are useful for debugging the failure
    print(error.info())

    print(json.loads(error.read()))                 