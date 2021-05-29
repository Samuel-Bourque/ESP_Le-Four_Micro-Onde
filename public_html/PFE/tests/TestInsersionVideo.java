<html>
<head>
<title>TestInsersionVideo.java</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.s0 { color: #a9b7c6;}
.s1 { color: #cc7832;}
.s2 { color: #6a8759;}
.s3 { color: #6897bb;}
.s4 { color: #808080;}
</style>
</head>
<body bgcolor="#2b2b2b">
<table CELLSPACING=0 CELLPADDING=5 COLS=1 WIDTH="100%" BGCOLOR="#606060" >
<tr><td><center>
<font face="Arial, Helvetica" color="#000000">
TestInsersionVideo.java</font>
</center></td></tr></table>
<pre>
<span class="s1">import </span><span class="s0">org.openqa.selenium.By</span><span class="s1">;</span>
<span class="s1">import </span><span class="s0">org.openqa.selenium.WebDriver</span><span class="s1">;</span>
<span class="s1">import </span><span class="s0">org.openqa.selenium.WebElement</span><span class="s1">;</span>
<span class="s1">import </span><span class="s0">org.openqa.selenium.chrome.ChromeDriver</span><span class="s1">;</span>

<span class="s1">public class </span><span class="s0">TestInsersionVideo {</span>

    <span class="s1">public static void </span><span class="s0">waiting(</span><span class="s1">int </span><span class="s0">ms){</span>
        <span class="s1">try</span><span class="s0">{</span>
            <span class="s0">Thread.sleep(ms)</span><span class="s1">;</span>
        <span class="s0">}</span><span class="s1">catch </span><span class="s0">(InterruptedException ex){</span>
            <span class="s0">Thread.currentThread().interrupt()</span><span class="s1">;</span>
        <span class="s0">}</span>
    <span class="s0">}</span>
    <span class="s1">public static void </span><span class="s0">main(String[] args) {</span>
        <span class="s0">System.setProperty(</span><span class="s2">&quot;webdriver.chrome.driver&quot;</span><span class="s1">, </span><span class="s2">&quot;C:</span><span class="s1">\\</span><span class="s2">Users</span><span class="s1">\\</span><span class="s2">1534336</span><span class="s1">\\</span><span class="s2">Desktop</span><span class="s1">\\</span><span class="s2">chromedriver87.exe&quot;</span><span class="s0">)</span><span class="s1">;</span>

        <span class="s0">WebDriver driver = </span><span class="s1">new </span><span class="s0">ChromeDriver()</span><span class="s1">;</span>

        <span class="s0">driver.get(</span><span class="s2">&quot;http://web3ru38.cegep.priv/~jamriou/gestion.php&quot;</span><span class="s0">)</span><span class="s1">;</span>


        <span class="s0">WebElement email = driver.findElement(By.id(</span><span class="s2">&quot;email&quot;</span><span class="s0">))</span><span class="s1">;</span>
        <span class="s0">WebElement button = driver.findElement(By.name(</span><span class="s2">&quot;submit&quot;</span><span class="s0">))</span><span class="s1">;</span>
        <span class="s0">WebElement password = driver.findElement(By.name(</span><span class="s2">&quot;password&quot;</span><span class="s0">))</span><span class="s1">;</span>

        <span class="s0">email.click()</span><span class="s1">;</span>
        <span class="s0">email.sendKeys(</span><span class="s2">&quot;test2@connection.com&quot;</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">waiting(</span><span class="s3">2000</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">password.click()</span><span class="s1">;</span>
        <span class="s0">password.sendKeys(</span><span class="s2">&quot;test&quot;</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">button.click()</span><span class="s1">;</span>
        <span class="s0">waiting(</span><span class="s3">2000</span><span class="s0">)</span><span class="s1">;</span>

        <span class="s0">WebElement title = driver.findElement(By.id(</span><span class="s2">&quot;title&quot;</span><span class="s0">))</span><span class="s1">;</span>
        <span class="s0">WebElement description = driver.findElement(By.id(</span><span class="s2">&quot;description&quot;</span><span class="s0">))</span><span class="s1">;</span>
        <span class="s0">WebElement url = driver.findElement(By.id(</span><span class="s2">&quot;url&quot;</span><span class="s0">))</span><span class="s1">;</span>
        <span class="s0">WebElement button2 = driver.findElement(By.id(</span><span class="s2">&quot;submit&quot;</span><span class="s0">))</span><span class="s1">;</span>

        <span class="s0">title.click()</span><span class="s1">;</span>
        <span class="s0">title.sendKeys(</span><span class="s2">&quot;Video Selenium&quot;</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">waiting(</span><span class="s3">2000</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">description.click()</span><span class="s1">;</span>
        <span class="s0">description.sendKeys(</span><span class="s2">&quot;Une video pour tester avec Selenium&quot;</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">waiting(</span><span class="s3">2000</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">url.click()</span><span class="s1">;</span>
        <span class="s0">url.sendKeys(</span><span class="s2">&quot;https://www.youtube.com/watch?v=FRn5J31eAMw&quot;</span><span class="s0">)</span><span class="s1">;</span>
        <span class="s0">button2.click()</span><span class="s1">;</span>
        <span class="s4">//driver.quit();</span>
    <span class="s0">}</span>
<span class="s0">}</span></pre>
</body>
</html>