function base64ToBlob(base64) {
    const [meta, data] = base64.split(',');
    const mime = meta.match(/:(.*?);/)[1];
    const bytes = atob(data);
    const buffer = new Uint8Array(bytes.length);
  
    for (let i = 0; i < bytes.length; i++) {
      buffer[i] = bytes.charCodeAt(i);
    }
  
    return new Blob([buffer], { type: mime });
  }
  
  // Exemplo de uso:
  const base64 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...";
  const blob = base64ToBlob(base64);
  console.log(blob); // Blob da imagem

  //html

  //<img id="img" />

//const base64 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...";
//document.querySelector("#img").src = base64;