package showboard.squares;

import java.awt.Image;
import java.io.IOException;

import showboard.ISquare;


public class Void implements ISquare {

	protected Image[] images;
	
	public Void() throws IOException {
		images = new Image[] {null};
	}

	@Override
	public Image getImage() {
		return images[0];
	}
}