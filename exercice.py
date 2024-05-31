from bardapi import Bard
import os

os.environ["_BARD_API_KEY"] = "g.a000kAgAi1U86NrsDserpOs4vZxh-LYzp2dYaFbjrd83hAfvwNMEKdi6MU0q6sIbLTBzk4hRnQACgYKAVISARASFQHGX2MiDwVqmhrcf7zDk5meVRHs_RoVAUF8yKo3o23tvhGPpAq4rcrW_zw20076"
message = input("Enter Your Prompt:")

print(Bard().get_answer(str(message))['content'])
