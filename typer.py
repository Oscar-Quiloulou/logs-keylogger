import tkinter as tk
import time
import threading
import pyautogui

def generate_codes():
    code = 0
    while True:
        yield f"{code:06d}"
        code += 1

gen = generate_codes()

def start_typing():
    time.sleep(3)  # délai pour placer le curseur

    try:
        while True:
            code = next(gen)  # récupère la prochaine portion
            pyautogui.write(code, interval=0.05)
            time.sleep(0.2)  # petit délai entre les blocs
    except StopIteration:
        pass  # fin du générateur

def on_click():
    threading.Thread(target=start_typing).start()

root = tk.Tk()
root.title("Auto-typer")

btn = tk.Button(root, text="Démarrer", command=on_click)
btn.pack(padx=20, pady=20)

root.mainloop()
