package view;

import java.awt.Color;
import javax.swing.JPanel;
import java.awt.Font;
import java.awt.GradientPaint;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;


import model.assignData;

public class Panel extends JPanel {
		
	private int i = 0;
	private int posX = 0;
	private int posY = 0;
	
	private static final int headerY = 85;
	private static final int footerY = 80;
	private static final int decallageF = -80;
	private static final int decallageF_H = 5;
	private static final int decallageH_H = 10;
	private static final int decallageF_Y = -250;
	private static final int DEBUT_ALERTE_PTR = 2;
	 
	Font font = new Font("Time New Roman", Font.PLAIN, 20);
	Font title = new Font("Arial", Font.BOLD, 36);
	
	public void paintComponent(Graphics g){
		System.out.println("REPAINT n° "+i++);
			    
	    //REINITIALISATION DE L'INTERFACE
	    g.setColor(new Color(255, 255, 255));
	    //On le dessine de sorte qu'il occupe toute la surface
	    g.fillRect(0, 0, this.getWidth(), this.getHeight());
	    //On redéfinit une couleur pour le rond
	    g.setColor(Color.BLACK);
	    g.setFont(font);
	    
	    //HEADER
	    g.setColor(new Color(242, 242, 242));
	    g.fillRect(0, 0, this.getWidth(), headerY);
	   
	    //FOOTER
	    g.fillRect(0, this.getHeight()-footerY, this.getWidth(), footerY);

	    //TITLE
		g.setFont(title);
		g.setColor(Color.BLACK);
	    g.drawString("PIMP MY FRIDGE", (this.getWidth()/2)-(this.getWidth()/4)/2, (headerY/2)+decallageH_H);
	    g.setFont(font);
	    
	    //DATA
		g.drawString("Température interne: "	+ assignData.getTemperatureC_DHT() + "°C", 10, 150);
		g.drawString("Température de la canette: "	+ assignData.getTemperature_mesureeC_PT100() + "°C", 10, 250);
		g.drawString("Humidité relative: " + assignData.getHumidity_DHT() + "%", 10, 350);
		g.drawString("Point de rosée: " + assignData.getPoint_de_rosee() + "°C", 10, 450);
	    
		//INSTRUCTIONS	
		g.drawString("CONSIGNE: " + assignData.getConsigne() + "°C", (this.getWidth()/4)+decallageF, (this.getHeight()-footerY/2)+decallageF_H);
		g.drawString("HYSTERESIS: "	+ assignData.getPlageB() + "°C" + " <=> " + assignData.getPlageH() + "°C", 3*(this.getWidth()/4)+decallageF, (this.getHeight()-footerY/2)+decallageF_H);
		
		//IMAGES
		try {
		      Image imgCesi = ImageIO.read(new File("D:\\Programmes\\Eclipse2\\Workspace\\JAVA_A2_PMF\\src\\view\\exia.png"));
		      Image imgFrigo = ImageIO.read(new File("D:\\Programmes\\Eclipse2\\Workspace\\JAVA_A2_PMF\\src\\view\\frigo.png"));
		      Image imgAlerte = ImageIO.read(new File("D:\\Programmes\\Eclipse2\\Workspace\\JAVA_A2_PMF\\src\\view\\alert.png"));
		      
		      if (assignData.getTemperatureC_DHT() <= assignData.getPlageB()) g.setColor(Color.CYAN);
		      else if (assignData.getTemperatureC_DHT() > assignData.getPlageB() && assignData.getTemperatureC_DHT() <= assignData.getPlageH()) g.setColor(Color.GREEN);
		      else g.setColor(Color.RED);
		      
		      g.fillRect(this.getWidth()/2+128, this.getHeight()/2+decallageF_Y+8, 256, 495);
		      g.setColor(Color.BLACK);
		      
		      g.drawImage(imgCesi, 0, 0, 150, 80, null);
		      g.drawImage(imgFrigo, this.getWidth()/2, this.getHeight()/2+decallageF_Y, 512, 512, null);
		      		      
		      if(assignData.getTemperatureC_DHT() <= (assignData.getPoint_de_rosee() + DEBUT_ALERTE_PTR) 
		         || assignData.getTemperature_mesureeC_PT100() <= (assignData.getPoint_de_rosee() + DEBUT_ALERTE_PTR)
		      ) 
		    	  	g.drawImage(imgAlerte, this.getWidth()/2, this.getHeight()/2+decallageF_Y, this);	//On recouvre le frigo par l'alerte
		      
		      //g.drawImage(img, 0, 0, this.getWidth(), this.getHeight(), this);//Pour une image de fond
		      
		      
		      
		    } catch (IOException e) {
		      e.printStackTrace();
		    }
		
		//AFFICHAGE DYNAMIQUE
		
		
		//WAIT BEFORE REPAINT
		try {
			this.repaint();
			Thread.sleep(1000); //Ici, une pause d'une seconde
			
		} catch(InterruptedException e) {
			e.printStackTrace();
		}
	  }               

}
