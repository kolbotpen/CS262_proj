document.getElementById('fileElem').addEventListener('change', handleFiles);

function handleFiles(event) {
    const files = event.target.files;
    const fileList = document.getElementById('fileList');
    fileList.innerHTML = '';

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const listItem = document.createElement('div');
        listItem.className = 'd-flex align-items-center mt-2';

        // Get the file size in KB
        const fileSizeKB = (file.size / 1024).toFixed(2);
        
        // Append the file name with the file size
        const fileNameWithSize = `${file.name} (${fileSizeKB} KB)`;

        // Create an image element for the file icon
        const fileIcon = document.createElement('img');
        fileIcon.src = getFileIcon(file);
        fileIcon.className = 'me-2';
        fileIcon.style.width = '24px';

        // Append the file icon and name to the list item
        listItem.appendChild(fileIcon);
        listItem.innerHTML += fileNameWithSize;

        // Append the list item to the file list container
        fileList.appendChild(listItem);
    }
}

function getFileIcon(file) {
    const ext = file.name.split('.').pop().toLowerCase();
    switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
        case 'webp':
            return URL.createObjectURL(file); // Show the image itself
        case 'pdf':
            return 'assets/images/icon-file-pdf.svg';
        case 'docx':
            return 'assets/images/icon-file-docx.svg';
        case 'zip':
            return 'assets/images/icon-file-zip.svg';
        case 'mp4':
        case 'mkv':
        case 'mov':
        case 'avi':
            return 'assets/images/icon-file-video.svg';
        case 'mp3':
        case 'wav':
        case 'ogg':
            return 'assets/images/icon-file-audio.svg';
        case 'html':
        case 'css':
        case 'js':
        case 'cpp':
        case 'cs':
        case 'c':
        case 'java':
        case 'exe':
        case 'py':
        case 'php':
        case 'sql':
            return 'assets/images/icon-file-code.svg';
        case 'txt':
        case 'xml':
        case 'csv':
        case 'xls':
        case 'xlsx':
            return 'assets/images/icon-file-text.svg';
        default:
            return 'assets/images/icon-file-unknown.svg';
    }
}


