package repository

import "strings"

func GetMarqueeBottomPhrases() []string {
	return strings.Split(GetDeviceData().Phrases, ";")
}

func GetAnimationTime() int {
	return 35
}

func GetInfoRightText() []string {
	return []string{}
}
