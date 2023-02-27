En C:/Users/Administrator/Downloads/ProcessMonitor
  - C:\Windows\System32\cmd.exe /c "Procmon64.exe /noconnect /AcceptEula"

## Clear event logs all
for /F "tokens=*" %1 in ('wevtutil.exe el') DO wevtutil.exe cl "%1"

# Clear cmd history
doskey /listsize=0

sc.exe config appidsvc start= auto