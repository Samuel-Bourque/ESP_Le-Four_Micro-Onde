package tests;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;


public class TestListeAttente {
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

        /*driver.get("http://web3ru38.cegep.priv/~dev/ajoutVideoUtilisateur.php");

        WebElement title = driver.findElement(By.id("title"));
        WebElement description = driver.findElement(By.id("description"));
        WebElement url = driver.findElement(By.id("url"));
        WebElement email = driver.findElement(By.id("email"));
        WebElement button = driver.findElement(By.id("submit"));

        //Ajout de la video
        title.click();
        title.sendKeys("test");
        description.click();
        description.sendKeys("Ceci est un test Selenium");
        url.click();
        url.sendKeys("https://www.youtube.com/watch?v=vTAOh1ARBOI");
        email.click();
        email.sendKeys("test2@connection.com");
        waiting(2000);
        button.click();
        waiting(2000);

        driver.get("http://web3ru38.cegep.priv/~dev/form.php");

        WebElement email2 = driver.findElement(By.id("email"));
        WebElement button2 = driver.findElement(By.name("submit"));
        WebElement password = driver.findElement(By.name("password"));

        //Connexion à la page
        email2.click();
        email2.sendKeys("test2@connection.com");
        password.click();
        password.sendKeys("test");
        waiting(2000);
        button2.click();
        waiting(2000);

        driver.get("http://web3ru38.cegep.priv/~dev/listeAttente.php");

        WebElement accept = driver.findElement(By.id("accept"));

        accept.click();
        waiting(4000);

        driver.get("http://web3ru38.cegep.priv/~dev/videos.php");
        waiting(4000);*/

        driver.get("http://web3ru38.cegep.priv/~dev/ajoutVideoUtilisateur.php");

        WebElement title = driver.findElement(By.id("title"));
        WebElement description = driver.findElement(By.id("description"));
        WebElement url = driver.findElement(By.id("url"));
        WebElement email = driver.findElement(By.id("email"));
        WebElement button = driver.findElement(By.id("submit"));

        //Ajout de la video
        title.click();
        title.sendKeys("test");
        description.click();
        description.sendKeys("Ceci est un test Selenium");
        url.click();
        url.sendKeys("https://www.youtube.com/watch?v=WAXjOifCe_8");
        email.click();
        email.sendKeys("test2@connection.com");
        waiting(2000);
        button.click();
        waiting(2000);

        driver.get("http://web3ru38.cegep.priv/~dev/form.php");

        WebElement email2 = driver.findElement(By.id("email"));
        WebElement button2 = driver.findElement(By.name("submit"));
        WebElement password = driver.findElement(By.name("password"));

        //Connexion à la page
        email2.click();
        email2.sendKeys("test2@connection.com");
        password.click();
        password.sendKeys("test");
        waiting(2000);
        button2.click();
        waiting(2000);

        driver.get("http://web3ru38.cegep.priv/~dev/listeAttente.php");

        WebElement refuse = driver.findElement(By.id("refuse"));

        refuse.click();
        waiting(4000);

        driver.get("http://web3ru38.cegep.priv/~dev/videos.php");
        waiting(4000);



    }
}
