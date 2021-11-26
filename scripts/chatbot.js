window.watsonAssistantChatOptions = {
    integrationID: "19042947-645e-4638-bbb6-9c9512a8cf2c",
    region: "us-east",
    serviceInstanceID: "ab82b599-d859-45f0-b603-c4f9c5597c53",
    showLauncher: true,
    onLoad: function(instance) {
        const button = document.querySelector('.chatLauncher');
    button.addEventListener('click', function clickListener() {
        instance.openWindow();
        });
    
    
        instance.render().then(function() {
        instance.updateLocale('pt-br');
        button.style.display = 'block';
        button.classList.add('open');
        });
    }
    };
    
    setTimeout(function(){const t=document.createElement('script');t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";document.head.appendChild(t);});