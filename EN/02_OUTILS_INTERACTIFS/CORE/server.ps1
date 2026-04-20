$port = 3000
$rootDir = Resolve-Path "$PSScriptRoot\..\..\..\"
$listener = New-Object System.Net.HttpListener
$listener.Prefixes.Add("http://localhost:$port/")

try {
    $listener.Start()
    while ($listener.IsListening) {
        $context = $listener.GetContext()
        $request = $context.Request
        $response = $context.Response

        $url = $request.Url.LocalPath
        if ($url -eq "/" -or $url -eq "") {
            $url = "/FR/02_OUTILS_INTERACTIFS/LECTEUR_EMPIRE_19.5.html"
        }

        $localPath = Join-Path $rootDir $url.TrimStart('/')
        
        if (Test-Path $localPath -PathType Leaf) {
            $ext = [System.IO.Path]::GetExtension($localPath).ToLower()
            $mime = switch ($ext) {
                ".html" { "text/html" }
                ".css"  { "text/css" }
                ".js"   { "text/javascript" }
                ".png"  { "image/png" }
                ".jpg"  { "image/jpeg" }
                ".svg"  { "image/svg+xml" }
                ".md"   { "text/markdown" }
                ".puml" { "text/plain" }
                ".php"  { "text/plain" }
                ".java" { "text/plain" }
                ".sql"  { "text/plain" }
                default { "application/octet-stream" }
            }

            $buffer = [System.IO.File]::ReadAllBytes($localPath)
            $response.ContentType = "$mime; charset=utf-8"
            $response.ContentLength64 = $buffer.Length
            $response.OutputStream.Write($buffer, 0, $buffer.Length)
        } else {
            $response.StatusCode = 404
            $html = "<h1>404 Not Found</h1><p>File not found: $url</p>"
            $buffer = [System.Text.Encoding]::UTF8.GetBytes($html)
            $response.OutputStream.Write($buffer, 0, $buffer.Length)
        }
        $response.Close()
    }
} finally {
    $listener.Stop()
}
