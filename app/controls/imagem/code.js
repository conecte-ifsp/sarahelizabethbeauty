function toBase64(file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => resolve(reader.result);
      reader.onerror = error => reject(error);
    });
  }
  
  // Exemplo de uso
  const input = document.querySelector("#file");
  
  input.addEventListener("change", async () => {
    const file = input.files[0];
    const base64 = await toBase64(file);
    console.log(base64); // Aqui sai o Base64
  });