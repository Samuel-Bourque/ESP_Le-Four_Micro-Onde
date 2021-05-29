package com.example.testsqli;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

class TestSQLi {
    public static void waiting(int ms){
        try{
            Thread.sleep(ms);
        }catch (InterruptedException ex){
            Thread.currentThread().interrupt();
        }
    }
    public static void main(String[] args) {
        System.out.println("Hello");
        System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");

        WebDriver driver = new ChromeDriver();

        driver.get("http://web3ru38.cegep.priv/~dev/form.php");

        WebElement email = driver.findElement(By.id("email"));
        WebElement button = driver.findElement(By.name("submit"));
        WebElement password = driver.findElement(By.name("password"));

        email.click();
        email.sendKeys("nom@test.com OR 1=1-- '");
        password.sendKeys("test");
        waiting(2000);
        button.click();
    }
}