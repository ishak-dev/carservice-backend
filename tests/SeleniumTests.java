import io.github.bonigarcia.wdm.WebDriverManager;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.edge.EdgeDriver;
import org.openqa.selenium.edge.EdgeOptions;

public class CarServiceTests {
    private static String adminEmail="johndoe@example.com";
    private static String adminPassword = "812483f";

    public static void main(String[] args) {
        System.setProperty("webdriver.chrome.driver", "C:/Users/Bilal/Desktop/bilCHa/Programiranje/chromedriver.exe");
        System.setProperty("webdriver.chrome.verboseLogging", "true");
        System.setProperty("webdriver.chrome.logfile", "path/to/chromedriver.log");

           WebDriver driver = new ChromeDriver();

        login(driver);
        addProduct(driver);
        editProduct(driver);
        logout(driver);
        try {
            Thread.sleep(500);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
    public static void logout(WebDriver driver){
        WebElement logoutButton = driver.findElement(By.xpath("/html/body/div/div/div[1]/ul/li[5]"));
        logoutButton.click();
    }
    public static void editProduct(WebDriver driver){
        driver.get("https://car-service-ibu.netlify.app/adminArticles");
        WebElement editButton = driver.findElement(By.xpath("/html/body/div/div/div[2]/div[1]/table/tbody[1]/tr/td[4]/button"));
        editButton.click();
        WebElement quantityField = driver.findElement(By.xpath("//div[@class='modal-body']//input[@name='quantity']"));

        quantityField.clear();
        quantityField.sendKeys("10");

    }
    public static void addProduct(WebDriver driver){
        driver.get("https://car-service-ibu.netlify.app/adminArticles");
        WebElement addButton = driver.findElement(By.xpath("//*[@id=\"root\"]/div/div[2]/button"));

        addButton.click();
        try {
            Thread.sleep(500);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        WebElement nameField = driver.findElement(By.xpath("//form//input[@name='name']"));
        nameField.sendKeys("Alternator");

        WebElement descriptionField = driver.findElement(By.xpath("//form//input[@name='description']"));
        descriptionField.sendKeys("Quality car alternator");

        WebElement priceField = driver.findElement(By.xpath("//form//input[@name='price']"));
        priceField.sendKeys("59.99");

        WebElement photoLinkField = driver.findElement(By.xpath("//form//input[@name='photo_link']"));
        photoLinkField.sendKeys("https://example.com/alternator.jpg");

        WebElement quantityField = driver.findElement(By.xpath("//form//input[@name='quantity']"));
        quantityField.sendKeys("10");

        WebElement saveChangesButton = driver.findElement(By.xpath("/html/body/div[3]/div/div/div[3]/button[2]"));
        saveChangesButton.click();

    }
    public static void login(WebDriver driver){
        driver.get("https://car-service-ibu.netlify.app/login");

        WebElement emailField = driver.findElement(By.id("username"));
        WebElement passwordField = driver.findElement(By.id("password"));

        emailField.sendKeys(adminEmail);
        passwordField.sendKeys(adminPassword);

        WebElement loginButton = driver.findElement(By.tagName("button"));
        loginButton.click();

    }




}
