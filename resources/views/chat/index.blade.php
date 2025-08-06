@extends('layout.app')
<style>
    .chat-container {
    max-width: 600px;
    margin: auto;
}

.card-body {
    max-height: 400px;
    overflow-y: auto;
    border: 1px solid #ddd;
    padding: 15px;
    background: #f9f9f9;
}

.message {
    margin-bottom: 10px;
}

.user {
    color: blue;
}

.bot {
    color: green;
}

form {
    margin-top: 15px;
    display: flex;
}

input[type="text"] {
    flex: 1;
    padding: 8px;
    font-size: 16px;
}

button {
    padding: 8px 15px;
    font-size: 16px;
}
.message {
    padding: 8px 12px;
    margin-bottom: 10px;
    border-radius: 15px;
    max-width: 70%;
    position: relative;
}

.user-message {
    background-color: #dcf8c6;  /* WhatsApp greenish */
    margin-left: auto;
    text-align: right;
}

.bot-message {
    background-color: #ffffff;
    margin-right: auto;
    text-align: left;
    border: 1px solid #ddd;
}

.tick-icon {
    color: #4fc3f7; /* blue-ish tick */
    font-size: 14px;
    position: absolute;
    bottom: 5px;
    right: 10px;
}

</style>
@section('content')
<div class="chat-container">
    <h2>Simple Laravel Chatbot</h2>
    <div class="card">
        <div class="card-body" id="chat-messages">
            @foreach($chats as $chat)
                <div class="message user-message">
                    <strong class="user">You:</strong> {{ $chat->user_message }}
                    <i class="fas fa-check tick-icon" title="Delivered"></i>  <!-- Tick icon -->
                </div>
                <div class="message bot-message">
                    <strong class="bot">Bot:</strong> {{ $chat->bot_response }}
                </div>
            @endforeach
        </div>

        <form id="chat-form">
            @csrf
            <input type="text" name="user_message" id="user_message" placeholder="Type a message..." required autocomplete="off">
            <button type="submit">Send</button>
        </form>
    </div>
</div>


<script>
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();  // page reload rok lo

    let messageInput = document.getElementById('user_message');
    let message = messageInput.value;
    if (!message.trim()) return;

    // Prepare AJAX request using Fetch API
    fetch("{{ route('chat.send') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ user_message: message })
    })
    .then(response => response.json())
    .then(data => {
        // Append user message
        let chatMessages = document.getElementById('chat-messages');

        let userDiv = document.createElement('div');
        userDiv.classList.add('message');
        userDiv.innerHTML = `<strong class="user">You:</strong> ${data.user_message}`;
        chatMessages.appendChild(userDiv);

        // Append bot response
        let botDiv = document.createElement('div');
        botDiv.classList.add('message');
        botDiv.innerHTML = `<strong class="bot">Bot:</strong> ${data.bot_response}`;
        chatMessages.appendChild(botDiv);

        messageInput.value = '';  // Clear input

        // Scroll to bottom to see new messages
        chatMessages.scrollTop = chatMessages.scrollHeight;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
// Append user message with tick icon
let userDiv = document.createElement('div');
userDiv.classList.add('message', 'user-message');
userDiv.innerHTML = `<strong class="user">You:</strong> ${data.user_message} <i class="fas fa-check tick-icon" title="Delivered"></i>`;
chatMessages.appendChild(userDiv);

</script>

@endsection







