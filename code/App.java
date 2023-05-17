package src;
import org.openqa.selenium.*;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

public class App{
    public static void main(String[] args) throws Exception{
        System.setProperty("webdriver.chrome.driver","C:/Program Files/chromedriver.exe");
        ChromeOptions options = new ChromeOptions();
        options.addArguments("--remote-allow-origins=*");
        WebDriver driver = new ChromeDriver(options);
        driver.get("http:/localhost/car/");
        driver.findElement(By.id("modalo")).click();
        driver.implicitly_wait(60);
        // #driver.find_element(By.ID,"loginModal");
        driver.findElement(By.id("username")).sendKeys("babu12");
        driver.findElement(By.id("password1")).sendKeys("1234");
        driver.findElement(By.id("submit")).click();
        String expectedurl ="http://localhost/car/c-h.php";
        String currenturl=driver.getCurrentUrl();
        if (expectedurl.equalsIgnoreCase(currenturl)){
            System.out.println("Test Case Passed");
        }
        else{
            System.out.println("Testcase Failed");
            }
            driver.quit();
    }
}