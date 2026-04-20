const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 3000;

/**
 * SERVEUR STATIQUE NATIF (ZÉRO DÉPENDANCE)
 * Conçu pour servir les ressources du projet de préparation
 */
const server = http.createServer((req, res) => {
    let filePath = '.' + req.url;
    if (filePath === './') {
        filePath = './LECTEUR_EMPIRE_19.5.html';
    }

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
                res.end('<h1>404 Not Found</h1><p>Le fichier demandé est introuvable.</p>', 'utf-8');
            } else {
                res.writeHead(500);
                res.end(`Désolé, une erreur serveur est survenue : ${error.code} ..\n`);
            }
        } else {
            res.writeHead(200, { 'Content-Type': contentType });
            res.end(content, 'utf-8');
        }
    });
});

server.listen(PORT, () => {
    console.log(`--------------------------------------------------`);
    console.log(`🚀 SERVEUR EMPIRE 19.5 LANCÉ AVEC SUCCÈS !`);
    console.log(`🔗 Accès : http://localhost:${PORT}`);
    console.log(`📂 Dossier racine : ${process.cwd()}`);
    console.log(`--------------------------------------------------`);
});
