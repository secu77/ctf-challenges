from hashlib import md5
import os, time
from virus_total_apis import PublicApi

API_KEY = "PUT_HERE_YOUR_VT_API_KEY"

api = PublicApi(API_KEY)

path = "anal_me"
files = []
# r=root, d=directories, f = files
for r, d, f in os.walk(path):
    for file in f:
        files.append(os.path.join(r, file))

response = None
try:

  for fil in files:
      with open(fil, "rb") as f:
          file_hash = md5(f.read()).hexdigest()

      response = api.get_file_report(file_hash)

      if response["response_code"] == 200:
          if 'positives' not in response["results"]:
            continue

          if response["results"]["positives"] > 0:
              print(f"Archivo {fil} malicioso.")
          else:
              print(f"Archivo {fil} seguro.")
      else:
          print(f"No ha podido obtenerse el análisis del archivo {fil}")
          print(response)
      time.sleep(70)

except Exception as e:
  print(e)
  print(response)
