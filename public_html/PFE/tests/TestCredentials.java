package com.example.testcredentials;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class TestCredentials {

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

        //Pour le moment, le switch de la fenêtre pop-up -> vraie fenêtre ne fonctionne pas
        //Pour tester: mettre les tests en commentaire à l'exception de celui voulant être executé.
        //test 1: email valide, non existant et aucun password
        email.click();
        email.sendKeys("nom@test.com");
        waiting(2000);
        button.click();
        waiting(2000);
        driver.switchTo().alert().accept();
        //driver.switchTo().defaultContent(); ||Ne Fonctionne pas.

        //test 2: email valide et password invalide
        email.click();
        email.sendKeys("test2@connection.com");
        password.sendKeys("password invalide");
        waiting(2000);
        button.click();
        waiting(2000);
        driver.switchTo().alert().accept();

        //test 3: aucun email et aucun password
        waiting(2000);
        button.click();


        //driver.quit();
    }
}



