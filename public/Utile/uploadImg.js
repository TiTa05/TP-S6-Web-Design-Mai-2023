const input = document.getElementById("selectImage");
const imageCode = document.getElementById("imageCode");
const convertBase64 = (file) => {
    return new Promise((resolve, reject) => {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(file);
        fileReader.onload = () => {
            resolve(fileReader.result);
        };
        fileReader.onerror = (error) => {
            reject(error);
        };
    });
};
const uploadImage = async (event) => {
    const file = event.target.files[0];
    const base64 = await convertBase64(file);
    imageCode.value = base64;
    console.log(imageCode.value);
};
input.addEventListener("change", (e) => {
    uploadImage(e);
});