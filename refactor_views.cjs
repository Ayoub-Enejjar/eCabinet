const fs = require('fs');
const cheerio = require('cheerio');

const viewsDir = 'c:/eCabinet/resources/views/doctor/';
const layoutPath = 'c:/eCabinet/resources/views/layouts/doctor.blade.php';

const files = fs.readdirSync(viewsDir).filter(f => f.endsWith('.blade.php'));

let layoutSaved = false;

files.forEach(file => {
    const filePath = viewsDir + file;
    const html = fs.readFileSync(filePath, 'utf8');
    const $ = cheerio.load(html);

    if (!layoutSaved) {
        // Create the layout from the first file
        const bodyClass = $('body').attr('class') || '';
        const headHtml = $('head').html();
        
        // Sidebar and Header
        const asideHtml = $('aside').parent().html(); // This might get everything if not careful
        // The structure is <body><aside>...</aside><main><header>...</header><div class="p-8...">...</div></main></body>
        
        $('main').empty().append("\n    @yield('content')\n");
        const layoutHtml = `<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    ${headHtml}
</head>
<body class="${bodyClass}">
    ${$('body').html()}
</body>
</html>`;
        fs.writeFileSync(layoutPath, layoutHtml);
        layoutSaved = true;
    }

    // Now extract content
    const contentHtml = cheerio.load(html)('main > div.p-8.space-y-8').parent().html(); 
    // Wait, the content is inside <main><header>...</header><content></main>
    // Just grab everything inside <main> EXPLICITLY excluding the <header> tag
    
    let mainHtml = '';
    cheerio.load(html)('main').children().each((i, el) => {
        if (el.name !== 'header') {
            mainHtml += cheerio.load(html).html(el) + '\n';
        }
    });

    const newView = `@extends('layouts.doctor')

@section('content')
${mainHtml}
@endsection
`;
    fs.writeFileSync(filePath, newView);
});

console.log("Refactoring complete.");
