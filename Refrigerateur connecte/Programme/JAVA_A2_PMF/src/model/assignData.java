package model;

import java.util.Scanner;

public abstract class assignData {
	
	//protected static int i = 0;
	//protected static float nombre[] = new float[100];
	protected static float humidity_DHT = 0;
	protected static float temperatureC_DHT = 0;
	protected static float temperatureF_DHT = 0;
	protected static float heat_indexC_DHT = 0;
	protected static float heat_indexF_DHT = 0;
	protected static float tension_Mesuree_PT100 = 0;
	protected static float resistance_exercee_PT100 = 0;
	protected static float temperature_mesureeK_PT100 = 0;
	protected static float temperature_mesureeC_PT100 = 0;
	protected static float point_de_rosee = 0;
	protected static float consigne = 0;
	protected static float plageB = 0;
	protected static float plageH = 0;
	protected static String line = "";
	protected static String[] lineSplit = null;
	
	//FONCTION D'EXTRACTION
	public static void parse(String data) {
		String line = "";
		String[] lineSplit = null;
		
		Scanner scan = new Scanner(data);
		while (scan.hasNextLine()) {
			line = scan.nextLine();
			if(line.matches(".*[0-9]+.*")) {
				//System.out.print("NOMBRE DETECTE : ");
				lineSplit = line.split("( |\t)");
				for(int z = 0; z < lineSplit.length; z++) {
					//System.out.print("||"+lineSplit[z]+"|| ");
					if(lineSplit[z].matches("^[0-9]+\\.?[0-9]+$")) {
						//System.out.println("IS NUMBER "+lineSplit[z]);
						if(lineSplit[z-1].equalsIgnoreCase("Humidity:")) setHumidity_DHT(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("TemperatureC:")) setTemperatureC_DHT(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("TemperatureF:")) setTemperatureF_DHT(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("Heat_indexC:")) setHeat_indexC_DHT(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("Heat_indexF:")) setHeat_indexF_DHT(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("Tension_Mesuree:")) setTension_Mesuree_PT100(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("Resistance_exercee:")) setResistance_exercee_PT100(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("Temperature_mesureeK:")) setTemperature_mesureeK_PT100(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("Temperature_mesureeC:")) setTemperature_mesureeC_PT100(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("POINT_DE_ROSEE:")) setPoint_de_rosee(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("CONSIGNE:")) setConsigne(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("PLAGE_BAS:")) setPlageB(Float.parseFloat(lineSplit[z]));
						if(lineSplit[z-1].equalsIgnoreCase("PLAGE_HAUT:")) setPlageH(Float.parseFloat(lineSplit[z]));
					}
				}
			}
		}
		scan.close();
		//return "CHAINE PARSEE !";
	}

	
	//GETTERS & SETTERS
	public static float getHumidity_DHT() {
		return humidity_DHT;
	}

	public static void setHumidity_DHT(float humidity_DHT) {
		assignData.humidity_DHT = humidity_DHT;
	}

	public static float getTemperatureC_DHT() {
		return temperatureC_DHT;
	}

	public static void setTemperatureC_DHT(float temperatureC_DHT) {
		assignData.temperatureC_DHT = temperatureC_DHT;
	}

	public static float getTemperatureF_DHT() {
		return temperatureF_DHT;
	}

	public static void setTemperatureF_DHT(float temperatureF_DHT) {
		assignData.temperatureF_DHT = temperatureF_DHT;
	}

	public static float getHeat_indexC_DHT() {
		return heat_indexC_DHT;
	}

	public static void setHeat_indexC_DHT(float heat_indexC_DHT) {
		assignData.heat_indexC_DHT = heat_indexC_DHT;
	}

	public static float getHeat_indexF_DHT() {
		return heat_indexF_DHT;
	}

	public static void setHeat_indexF_DHT(float heat_indexF_DHT) {
		assignData.heat_indexF_DHT = heat_indexF_DHT;
	}

	public static float getTension_Mesuree_PT100() {
		return tension_Mesuree_PT100;
	}

	public static void setTension_Mesuree_PT100(float tension_Mesuree_PT100) {
		assignData.tension_Mesuree_PT100 = tension_Mesuree_PT100;
	}

	public static float getResistance_exercee_PT100() {
		return resistance_exercee_PT100;
	}

	public static void setResistance_exercee_PT100(float resistance_exercee_PT100) {
		assignData.resistance_exercee_PT100 = resistance_exercee_PT100;
	}

	public static float getTemperature_mesureeK_PT100() {
		return temperature_mesureeK_PT100;
	}

	public static void setTemperature_mesureeK_PT100(float temperature_mesureeK_PT100) {
		assignData.temperature_mesureeK_PT100 = temperature_mesureeK_PT100;
	}

	public static float getTemperature_mesureeC_PT100() {
		return temperature_mesureeC_PT100;
	}

	public static void setTemperature_mesureeC_PT100(float temperature_mesureeC_PT100) {
		assignData.temperature_mesureeC_PT100 = temperature_mesureeC_PT100;
	}

	public static float getPoint_de_rosee() {
		return point_de_rosee;
	}

	public static void setPoint_de_rosee(float point_de_rosee) {
		assignData.point_de_rosee = point_de_rosee;
	}

	public static float getConsigne() {
		return consigne;
	}

	public static void setConsigne(float consigne) {
		assignData.consigne = consigne;
	}

	public static float getPlageB() {
		return plageB;
	}

	public static void setPlageB(float plageB) {
		assignData.plageB = plageB;
	}

	public static float getPlageH() {
		return plageH;
	}

	public static void setPlageH(float plageH) {
		assignData.plageH = plageH;
	}

}
