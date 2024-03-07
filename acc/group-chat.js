const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".btn"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

// sendBtn.onclick = ()=>{
//     let xhr = new XMLHttpRequest();
//     let url = "group-insert-chat.php?user_id=" + user_id;  // Use the user_id variable
//     xhr.open("POST", url, true);

//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//               inputField.value = "";
//               scrollToBottom();
//           }
//       }
//     }
//     let formData = new FormData(form);
//     xhr.send(formData);
// }
// chatBox.onmouseenter = ()=>{
//     chatBox.classList.add("active");
// }

// chatBox.onmouseleave = ()=>{
//     chatBox.classList.remove("active");
// }

// setInterval(() =>{
//     let xhr = new XMLHttpRequest();
//     let url = "group-get-chat.php?user_id=" + user_id;  // Use the user_id variable
//     xhr.open("POST", url, true);


//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//             let data = xhr.response;
//             chatBox.innerHTML = data;
//             if(!chatBox.classList.contains("active")){
//                 scrollToBottom();
//               }
//           }
//       }
//     }
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.send("incoming_id="+incoming_id);
// }, 500);

function scrollToBottom(){
    chatBox.scrollToBottom = chatBox.scrollHeight;
  }







//   client-page script


  