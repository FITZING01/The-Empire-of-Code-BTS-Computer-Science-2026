const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 3000;

// Le serveur est dans FR/02_OUTILS_INTERACTIFS/CORE, la racine est donc 3 dossiers plus haut
const ROOT_DIR = path.join(__dirname, '../../../');

const server = http.createServer((req, res) => {
    let urlPath = req.url;
    
    // Page d'accueil par défaut
    if (urlPath === '/' || urlPath === '') {
        urlPath = '/FR/02_OUTILS_INTERACTIFS/LECTEUR_EMPIRE_19.5.html';
    }

    const filePath = path.join(ROOT_DIR, urlPath);
    const extname = String(path.extname(filePath)).toLowerCase();
    
    const mimeTypes = {
        '.html': 'text/html',
        '.js': 'text/javascript',
        '.css': 'text/css',
        '.json': 'application/json',
        '.png': 'image/png',
        '.jpg': 'image/jpg',
        '.gif': 'image/gif',
        '.svg': 'image/svg+xml',
        '.sql': 'text/plain',
        '.java': 'text/plain',
        '.php': 'text/plain',
        '.md': 'text/markdown',
        '.puml': 'text/plain',
    };

    const contentType = mimeTypes[extname] || 'application/octet-stream';

    fs.readFile(filePath, (error, content) => {
        if (error) {
            if (error.code === 'ENOENT') {
                res.writeHead(404, { 'Content-Type': 'text/html' });
                res.end('<h1>404 Not Found</h1><p>Le fichier est introuvable au chemin : ' + urlPath + '</p>', 'utf-8');
            } else {
                res.writeHead(500);
                res.end(`Erreur serveur : ${error.code} ..\n`);
            }
        } else {
            res.writeHead(200, { 'Content-Type': contentType });
            res.end(content, 'utf-8');
        }
    });
});

server.listen(PORT, () => {
    console.log(`🚀 EMPIRE SERVER UPDATED - ROOT: ${ROOT_DIR}`);
});
