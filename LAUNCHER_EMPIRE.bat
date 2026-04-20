@echo off
TITLE EMPIRE OF CODE - PORTABLE LOADER
COLOR 0B

echo ======================================================
echo           WELCOME TO THE EMPIRE OF CODE
echo       (Zero Installation Portable Software)
echo ======================================================
echo.
echo [1] Starting Native Windows Server...
echo     No Node.js or Installation Required.

:: Kill any existing server on port 3000
powershell -Command "Stop-Process -Id (Get-NetTCPConnection -LocalPort 3000 -ErrorAction SilentlyContinue).OwningProcess -Force" >nul 2>&1

:: Start the PowerShell server in a hidden background process
start /B powershell -ExecutionPolicy Bypass -File "FR/02_OUTILS_INTERACTIFS/CORE/server.ps1" >nul 2>&1

echo [2] Opening Learning Platform...
timeout /t 3 /nobreak >nul

:: Open default browser
start http://localhost:3000

echo.
echo ======================================================
echo   PLATFORM IS NOW LIVE AT http://localhost:3000
echo   YOU CAN NOW BROWSE ALL COURSES AND CODE.
echo ======================================================
echo.
echo Press any key to stop the server and close this window...
pause >nul

:: Clean up: Kill the powershell server process
powershell -Command "Stop-Process -Id (Get-NetTCPConnection -LocalPort 3000).OwningProcess -Force" >nul 2>&1
exit
