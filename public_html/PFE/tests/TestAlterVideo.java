package tests;

import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class TestAlterVideo {

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

        //js.executeScript("window.scrollBy(0,1000)");

        WebElement link = driver.findElement(By.id("0"));

        link.click();

        waiting(2000);

        // Test 1 --> Modification Title-Description-Video
        /*WebElement title = driver.findElement(By.id("title"));
        title.click();
        title.clear();
        title.sendKeys("modification Selenium");

        waiting(2000);

        WebElement description = driver.findElement(By.id("description"));
        description.click();
        description.clear();
        description.sendKeys("modification Selenium");

        waiting(2000);

        WebElement url = driver.findElement(By.id("url"));
        url.click();
        url.clear();
        url.sendKeys("https://www.youtube.com/watch?v=15JCb6P60Vw&ab_channel=Jensv12");

        waiting(2000);

        js.executeScript("window.scrollBy(0,1000)");

        WebElement btn = driver.findElement(By.id("submit"));
        btn.click(); */
        //Fin Test 1

        //Test 2 - Transfert de BD

        WebElement RBtnTuto = driver.findElement(By.id("estTuto"));
        RBtnTuto.click();

        js.executeScript("window.scrollBy(0,1000)");

        waiting(2000);

        WebElement RBtnAng = driver.findElement(By.id("estAnglais"));
        RBtnAng.click();

        js.executeScript("window.scrollBy(0,1000)");

        WebElement btn = driver.findElement(By.id("submit"));
        btn.click();
        //Fin - Test 2







    }
}




