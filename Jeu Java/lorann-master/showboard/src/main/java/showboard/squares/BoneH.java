package showboard.squares;

import java.awt.Image;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import showboard.ISquare;


public class BoneH implements ISquare, Unpassable {

	protected Image[] images;
	
	public BoneH() throws IOException {
		images = new Image[] {ImageIO.read(new File("../sprites/horizontal_bone.png"))};
	}

	@Override
	public Image getImage() {
		return images[0];
	}
}