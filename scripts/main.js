document.addEventListener('DOMContentLoaded', () => {
    // Chat Functionality
    const sendBtn = document.getElementById('send-btn');
    const msgInput = document.getElementById('msg-input');
    const chatWindow = document.getElementById('chat-window');

    if (sendBtn && msgInput && chatWindow) {
        sendBtn.addEventListener('click', () => {
            const text = msgInput.value.trim();
            if (text) {
                const msgDiv = document.createElement('div');
                msgDiv.classList.add('message', 'user');
                msgDiv.textContent = text;
                
                chatWindow.appendChild(msgDiv);
                chatWindow.scrollTop = chatWindow.scrollHeight;
                msgInput.value = '';
            }
        });
    }
});