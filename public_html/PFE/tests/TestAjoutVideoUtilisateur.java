package tests;

import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class TestAjoutVideoUtilisateur {
    public static void waiting(int ms) {
        try {
            Thread.sleep(ms);
        } catch (InterruptedException ex) {
            Thread.currentThread().interrupt();
        }
    }

    public static void main(String[] args) {
        System.out.println("Hello");
        System.setProperty("webdriver.chrome.driver", "C:\\chromedriver.exe");

        WebDriver driver = new ChromeDriver();
        JavascriptExecutor js = (JavascriptExecutor) driver;

        driver.get("http://web3ru38.cegep.priv/~sambour/");
        waiting(2000);
        driver.manage().window().maximize();

        waiting(2000);

        driver.get("http://web3ru38.cegep.priv/~sambour/ajoutVideoUtilisateur.php");
        waiting(2000);
        driver.manage().window().maximize();

        waiting(2000);

        WebElement title = driver.findElement(By.id("title"));
        title.click();
        title.sendKeys("Titre");

        waiting(2000);

        WebElement description = driver.findElement(By.id("description"));
        description.click();
        description.sendKeys("description");

        waiting(2000);

        WebElement url = driver.findElement(By.id("url"));
        url.click();
        url.sendKeys("https://www.youtube.com/watch?v=-veOQVZyP0I&ab_channel=OmarGoshTV");

        waiting(2000);

        WebElement email = driver.findElement(By.id("email"));
        email.click();
        email.sendKeys("email@hotmail.com");

        waiting(2000);

        WebElement submit = driver.findElement(By.id("submit"));
        submit.click();

        waiting(5000);

    }
}
