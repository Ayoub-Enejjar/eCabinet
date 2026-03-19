const fs = require('fs');
const https = require('https');
const path = require('path');

const images = [
    { url: 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1920&q=80', path: 'public/images/precision-bg.jpg' },
    { url: 'https://images.unsplash.com/photo-1631217818242-e0ec946c5a5a?w=1920&q=80', path: 'public/images/verify-bg.jpg' },
    { url: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920&q=80', path: 'public/images/doctor-bg.jpg' }
];

async function download(url, dest) {
    const tempDest = dest + '.tmp';
    return new Promise((resolve, reject) => {
        const request = https.get(url, (response) => {
            if (response.statusCode === 301 || response.statusCode === 302) {
                download(response.headers.location, dest).then(resolve).catch(reject);
                return;
            }
            if (response.statusCode !== 200) {
                reject(new Error(`Status ${response.statusCode}`));
                return;
            }
            const file = fs.createWriteStream(tempDest);
            response.pipe(file);
            file.on('finish', () => {
                file.close();
                try {
                    if (fs.existsSync(dest)) fs.unlinkSync(dest);
                    fs.renameSync(tempDest, dest);
                    console.log(`Success: ${dest}`);
                    resolve();
                } catch (e) {
                    reject(e);
                }
            });
        }).on('error', (err) => {
            if (fs.existsSync(tempDest)) fs.unlinkSync(tempDest);
            reject(err);
        });
    });
}

(async () => {
    for (const img of images) {
        console.log(`Working on ${img.path}...`);
        try {
            await download(img.url, img.path);
        } catch (e) {
            console.error(`Failed ${img.path}: ${e.message}`);
        }
    }
})();
