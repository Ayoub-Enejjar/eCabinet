const fs = require('fs');
const https = require('https');

const images = [
    { url: 'https://images.unsplash.com/photo-1532187875605-2fe35f747c22?w=1920&q=80', path: 'public/images/precision-bg.jpg' },
    { url: 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1920&q=80', path: 'public/images/verify-bg.jpg' },
    { url: 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=1920&q=80', path: 'public/images/doctor-bg.jpg' }
];

async function download(url, dest) {
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        https.get(url, (response) => {
            if (response.statusCode === 302 || response.statusCode === 301) {
                download(response.headers.location, dest).then(resolve).catch(reject);
                return;
            }
            if (response.statusCode !== 200) {
                reject(new Error(`Failed to get '${url}' (${response.statusCode})`));
                return;
            }
            response.pipe(file);
            file.on('finish', () => {
                file.close(resolve);
            });
        }).on('error', (err) => {
            fs.unlink(dest, () => reject(err));
        });
    });
}

(async () => {
    for (const image of images) {
        console.log(`Downloading ${image.url} to ${image.path}...`);
        try {
            await download(image.url, image.path);
            console.log(`Successfully downloaded to ${image.path}`);
        } catch (err) {
            console.error(`Error downloading ${image.path}: ${err.message}`);
        }
    }
})();
