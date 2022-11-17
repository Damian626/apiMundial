subImages.forEach(images =>{
    images.onclick = () =>{
       src = images.getAttribute('src');
       mainImage.src = src;
    }
 });