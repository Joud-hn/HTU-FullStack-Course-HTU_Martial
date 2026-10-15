function randomInst(){
  
const randomImg=document.querySelectorAll('.random');
const instructors=document.querySelectorAll('.instructorCard img');
let imges=[];
for(let i=0;i< randomImg.length;i++){
imges.push(randomImg[i].src);
}
for(let i=imges.length-1;i>0;i--){
    let j=Math.floor(Math.random() * (i+1));
    let temp= imges[i];
    imges[i]=imges[j];
    imges[j]=temp
}
for(let i=0; i<instructors.length;i++){
    instructors[i].src=imges[i];
}
}
randomInst();