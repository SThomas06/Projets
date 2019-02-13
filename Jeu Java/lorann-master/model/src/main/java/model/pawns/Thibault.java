package model.pawns;

import java.awt.Dimension;
import java.awt.Image;
import java.awt.Point;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import model.Direction;
import showboard.ISquare;

public class Thibault extends Mobile {
	
	public Thibault(Direction direction, Point position) throws IOException {
		super(direction, position, new Image[] {ImageIO.read(new File("../sprites/thibault.png")),
												ImageIO.read(new File("../sprites/thibault_mouth.png"))});
		this.nbrImages = 2;
		this.dimension = new Dimension(128, 215);
	}
	
	public void attack(Point p, ISquare[][] squares) {
		// TODO
	}
}