import binascii

def xor_crypt_string(data, key, encode = False, decode = False):
  from itertools import izip, cycle
  import base64
   
  if decode:
    data = base64.decodestring(data)
  xored = ''.join(chr(ord(x) ^ ord(y)) for (x,y) in izip(data, cycle(key)))
   
  if encode:
    return base64.encodestring(xored).strip()
  return xored


secret_data = "4t4rl0s_3n_l4s_t1n13bl4s"
key = 'Anillo'

print("Datos:'{0}' y Key:'{1}'".format(secret_data,key))
cryptdata = xor_crypt_string(secret_data,key)
c = bytearray(cryptdata)
print("The cipher text is : '{0}'".format(binascii.hexlify(c)))
decdata = xor_crypt_string(cryptdata,key)
print("The plain text fetched: '{0}'".format(decdata))
