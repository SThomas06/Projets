package model;

import java.util.ArrayList;

public class Level {

private ArrayList<Integer> line;

    public Level() {
        super();
        this.line = new ArrayList<>();
    }
    
    public void add(int n) {
    	this.line.add(n);
    }

	public ArrayList<Integer> getLine() {
		return line;
	}
   
}