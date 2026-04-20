@echo off
TITLE EMPIRE OF CODE - BOOT LOADER
COLOR 0B

echo ======================================================
echo           WELCOME TO THE EMPIRE OF CODE
echo ======================================================
echo.
echo [1] Launching Local Learning Server...

:: Check for Node.js
where node >nul 2>nul
if %errorlevel% neq 0 (
    echo [!] ERROR: Node.js is not installed.
    echo Please install Node.js from https://nodejs.org/ to run this software.
    pause
    exit
)

:: Start server in background (invisible window)
start /B node FR/02_OUTILS_INTERACTIFS/CORE/server.js >nul 2>&1

echo [2] Opening Learning Platform...
timeout /t 2 /nobreak >nul

:: Open default browser
start http://localhost:3000

echo.
echo ======================================================
echo   PLATFORM IS NOW LIVE AT http://localhost:3000
echo   KEEP THIS WINDOW OPEN TO CONTINUE STUDYING
echo ======================================================
echo.
echo Press any key to stop server and exit...
pause >nul

:: Kill node processes associated with our server
taskkill /F /IM node.exe /T >nul 2>&1
exit
