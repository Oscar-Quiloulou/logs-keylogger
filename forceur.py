from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import time

def generate_codes():
    code = 0
    while True:
        yield f"{code:06d}"
        code += 1

driver = webdriver.Chrome()
driver.get("https://ton-site.com")

textbox = driver.find_element(By.ID, "monInput")

gen = generate_codes()

for _ in range(10):
    code = next(gen)
    textbox.clear()
    textbox.send_keys(code)
    textbox.send_keys(Keys.ENTER)
    time.sleep(0.5)

driver.quit()
