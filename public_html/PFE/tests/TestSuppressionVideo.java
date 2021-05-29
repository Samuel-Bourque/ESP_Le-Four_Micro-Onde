package tests;

import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class TestSuppressionVideo {
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
        JavascriptExecutor js = (JavascriptExecutor) driver;



        driver.get("http://web3ru38.cegep.priv/~dev/form.php");

        WebElement email = driver.findElement(By.id("email"));
        WebElement button = driver.findElement(By.name("submit"));
        WebElement password = driver.findElement(By.name("password"));

        //Connexion à la page
        email.click();
        email.sendKeys("test2@connection.com");
        password.click();
        password.sendKeys("test");
        waiting(2000);
        button.click();
        waiting(2000);

        driver.get("http://web3ru38.cegep.priv/~dev/videos.php?page=1");
        waiting(2000);
        driver.manage().window().maximize();
        
        js.executeScript("window.scrollBy(0,1000)");

        WebElement link = driver.findElement(By.id("0"));

        link.click();

        js.executeScript("window.scrollBy(0,1000)");

        WebElement delete = driver.findElement(By.id("delete"));
        delete.click();

        waiting(5000);

        driver.switchTo().alert().accept();


        waiting(5000);


        //driver.quit();
    }
}
